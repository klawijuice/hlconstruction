<?php

namespace App\Console\Commands\Admin;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class FirstAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:set {lastname} {firstname} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Cette commande permet de créer le premier compte administrateur";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (User::count() > 0){
            $this->error("Un administrateur existe déja. Merci de rentrer en contact avec lui pour la création de votre compte.");
        }else{
            $arguments = $this->arguments();
            if (strlen($arguments['lastname']) < 3){
                $this->error("Le nom est trop court. Au moins 3 caractères");
            }
            if (strlen($arguments['firstname']) < 3){
                $this->error("Votre prénom est trop court. Au moins 3 caractères");
            }
            if (!filter_var($arguments['email'], FILTER_VALIDATE_EMAIL)){
                $this->error("L'adresse email est invalide");
            }
            if (strlen($arguments['password']) < 8){
                $this->error("Le mot de passe doit avoir au moins 8 caractères");
            }
            if ($this->confirm('Do you wish to continue?')) {
                $role = Role::findOrCreate("super admin", "admin");
                $admin = User::create([
                    'name' => ucfirst($arguments['lastname'])." ".ucfirst($arguments['firstname']),
                    'username' => "Admin ".ucfirst($arguments['firstname']),
                    'email' => $arguments['email'],
                    'password' => Hash::make($arguments['password']),
                ]);
                $admin->assignRole($role);
                if ($admin){
                    $this->info("L'administrateur a été crée. Vous pouvez vous connecter dès maintenant");
                }else{
                    $this->info("Impossible de créer votre compte. Veuillez reéssayer svp!");
                }
            }else{
                $this->info("Au revoir!");
            }
        }
        return 0;
    }
}
