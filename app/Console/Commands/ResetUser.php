<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ResetUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:reset {id} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '重置用户密码';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = User::find($this->argument('id'));
        $password = $this->argument('password');

        if (empty($user)) {
            $this->error('输入的用户ID不存在');
        }

        try {
            $user->update([
                'password' => bcrypt($password)
            ]);

            $this->info('重置成功');
        } catch (\Exception $exception) {
            $this->error($exception->getMessage());
        }
    }
}
