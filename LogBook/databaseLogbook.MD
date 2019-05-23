#Instalação do mysql
## antes da instalação:
sudo mysql_install_db --user=mysql --basedir=/usr --datadir=/var/lib/mysql
##Guia interativo de medidas de segurança recomendadas do banco de dados:
<code>mysql_secure_installation</code>
Enter current password for root (enter for none):
Set root password? [Y/n] y
New password:
Re-enter new password:
Remove anonymous users? [Y/n] y
Disallow root login remotely? [Y/n] y
Remove test database and access to it? [Y/n] y
Reload privilege tables now? [Y/n] y

Para que o workbench funcionar no linux é necessário o pacote: gnome-keyring
##PHP com mysql:
Install and configure MySQL/MariaDB as described in MariaDB.
Uncomment the following lines in /etc/php/php.ini:

extension=pdo_mysql
extension=mysqli

##Eloquent Laravel:
<code>php artisan tinker</code>
Psy Shell v0.8.18 (PHP 7.3.5 — cli) by Justin Hileman
New version is available (current: v0.8.18, latest: v0.9.9)
>>> <code>\App\Contato::all()</code>
=> Illuminate\Database\Eloquent\Collection {#694
     all: [],
   }
>>> <code>$contato = new \App\Contato();</code>
=> App\Contato {#705}
>>> <code>$contato->nome = "Vinicius"</code>
=> "Vinicius"
>>> <code>$contato->tel = "719872222"</code>
=> "719872222"
>>> <code>$contato->email = "email@email.com"</code>
=> "email@email.com"
>>> <code>$contato</code>
=> App\Contato {#705
     nome: "Vinicius",
     tel: "719872222",
     email: "email@email.com",
   }
>>> <code>$contato->save();</code>
=> true
>>> <code>\App\Contato::all()</code>
=> Illuminate\Database\Eloquent\Collection {#711
     all: [
       App\Contato {#712
         id: 1,
         nome: "Vinicius",
         tel: "719872222",
         email: "email@email.com",
         created_at: "2019-05-20 23:42:21",
         updated_at: "2019-05-20 23:42:21",
       },
     ],
   }
>>> <code>$con = \App\Contato::find(1);</code>
=> App\Contato {#718
     id: 1,
     nome: "Vinicius",
     tel: "719872222",
     email: "email@email.com",
     created_at: "2019-05-20 23:42:21",
     updated_at: "2019-05-20 23:42:21",
   }
>>> <code>$con->delete();</code>
=> true
>>> <code>\App\Contato::all()</code>
=> Illuminate\Database\Eloquent\Collection {#694
     all: [],
   }
