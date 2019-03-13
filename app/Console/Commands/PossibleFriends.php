<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class PossibleFriends extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'possible-friends:view-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'View a table of all possible friends of users';

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
     * @return mixed
     */
    public function handle()
    {
		$headers = ['User', 'User2', 'Count'];
		DB::unprepared("DROP TABLE IF EXISTS temp_simple_possible_friends;");
		DB::unprepared("CREATE TEMPORARY TABLE temp_simple_possible_friends SELECT users_friends.user_id, friend_friends.friend_id, count(friend_friends.friend_id) as count FROM users_friends LEFT JOIN users_friends as friend_friends ON users_friends.friend_id = friend_friends.user_id AND friend_friends.friend_id <> users_friends.user_id AND NOT EXISTS( SELECT 1 FROM users_friends ex WHERE ex.user_id = friend_friends.friend_id AND ex.friend_id = users_friends.user_id LIMIT 1 ) GROUP BY 1,2 ORDER BY NULL");
		$users = DB::select('SELECT * FROM temp_simple_possible_friends');
		
		$this->table($headers, array_map(function($value){ return array_values((array)$value);}, $users));
    }
}
