<?php

use App\Models\User;
use App\Models\Task;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach($users as $user){
          $limit = random_int(5, 10);

          for($i=0; $i<$limit; $i++){
            $task = factory(Task::class)->make();
            $task->user()->associate($user);

            $task->save();
          }
        }
    }
}
