<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;   # POSSIBILITA USAR A QUERY SQL/BUILDER      (FIXO)

class Basedados
{
    public function pegarDados()
    {
        return DB::select("SELECT * FROM crud"); # get() [{}]
    }

    public function inserirDados($post)
    {
        $dados = array(

            'nome'=>$post->nameSend,
            'email'=>$post->emailSend,
            'mobile'=>$post->mobileSend,
            'place'=>$post->placeSend
        );

        DB::select("INSERT INTO crud VALUES(0, :nome, :email, :mobile, :place)", $dados);
    }

    public function atualizarDados($post)
    {
        /*
            Os IFs aqui servem p/ verificar se existe tal post
            como tbm, direcionar a requisição da mesma rota para diferentes funções

            Ou seja, varias funções p/ uma só rota
        */
        if(isset($post->updateidSend))
        {
            $response=DB::select("SELECT * FROM crud WHERE id=:id", array('id'=>$post->updateidSend))[0]; # first()

            echo json_encode($response);
        }

        //*******************************************
        # UPDATE QUERY

        if(isset($post->hiddendataSend))
        {
            $dados = array(

                'id'=>$post->hiddendataSend,
                'nome'=>$post->updatenameSend,
                'email'=>$post->updatemailSend,
                'mobile'=>$post->updatemobileSend,
                'place'=>$post->updateplaceSend
            );

            DB::select("UPDATE crud SET name=:nome, email=:email, mobile=:mobile, place=:place WHERE id=:id", $dados);
        }
    }

    public function deletarDados($post)
    {
        DB::select("DELETE FROM crud WHERE id=:id", array('id'=>$post->deleteSend));
    }
}
?>
