<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dados = [
        'name' => 'admin',
        'email' => 'admin@admin.com',
        'password' => bcrypt('admin')
      ];
        if(User::where('email','=',$dados['email'])->count() ){
          $usuario = User::where('email','=',$dados['email'])->first();
          $usuario->update($dados);
          echo 'Usuário admin atualizado';
        }else{
          User::create($dados);
          echo 'Usuário admin criado';
        }
    }
}
