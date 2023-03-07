<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;         # POSSIBILITA USAR O POST                   (FIXO)
use Illuminate\Support\Facades\Hash; # POSSIBILITA USAR O HASHING                (FIXO)
use Illuminate\Support\Facades\Mail; # POSSIBILITA USAR O EMAIL                  (FIXO)
use Session;                         # POSSIBILITA USAR A SESSÃO                 (FIXO)

use App\Mail\meuEmail;               # POSSIBILITA USAR A CLASSE DO EMAIL        (VARIÁVEL)
use App\classes\minhaClasse;         # POSSIBILITA USAR A NOSSA PRÓPRIA CLASSE   (VARIÁVEL)

use App\Models\Basedados;            # POSSIBILITA USAR O MODEL                  (VARIÁVEL)

class Main extends Controller
{
    public function index()
    {
        return view('pagina_inicial');
    }

    public function display()
    {
        $model = new Basedados;

        $rows = $model->pegarDados(); # get() [{}]

        $table='<table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Sl no</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Place</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>';

        $number=1;

        foreach($rows as $row)
        {
            $id=$row->id;
            $name=$row->name;
            $email=$row->email;
            $mobile=$row->mobile;
            $place=$row->place;

            $table.='<tbody>
                        <tr>
                            <td scope="row">'.$number.'</th>
                            <td>'.$name.'</td>
                            <td>'.$email.'</td>
                            <td>'.$mobile.'</td>
                            <td>'.$place.'</td>
                            <td>
                                <button class="btn btn-info" onclick="GetDetails('.$id.')">Update</button>
                                <button class="btn btn-danger" onclick="DeleteUser('.$id.')">Delete</button>
                            </td>
                        </tr>
                    </tbody>';
            $number++;
        }

        $table.='</table>';

        echo $table;
    }

    public function insert(Request $post)
    {
        $model = new Basedados;

        $model->inserirDados($post);
    }

    public function update(Request $post)
    {
        $model = new Basedados;

        $model->atualizarDados($post);
    }

    public function delete(Request $post)
    {
        $model = new Basedados;

        $model->deletarDados($post);
    }
}
