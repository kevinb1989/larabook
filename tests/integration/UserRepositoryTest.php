<?php

use App\Repositories\UserRepository;
use Laracasts\TestDummy\Factory as TestDummy;
class UserRepositoryTest extends \Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;

    protected function _before()
    {
        $this->repo = new UserRepository();
    }

    /** @test */
    public function it_follows_another_user(){
        //given I have two users
        $users = TestDummy::times(2)->create('App\User');

        //and one user follows another user
        $this->repo->follow($users[1]->id, $users[0]);

        //that I should see that user in the list of those that users[0] follows
        $this->tester->seeRecord('follows', [
            'follower_id' => $users[0]->id,
            'followed_id' => $users[1]->id
        ]);
    }

    /** @test */
    public function it_unfollows_another_user(){
        //given I have two users
        $users = TestDummy::times(2)->create('App\User');

        //and one user follows another user
        $this->repo->follow($users[1]->id, $users[0]);

        //when I unfollow that same user
        $this->repo->unfollow($users[1]->id, $users[0]);

        //that I should not see that user in the list of those that users[0] follows
        $this->tester->dontSeeRecord('follows', [
            'follower_id' => $users[0]->id,
            'followed_id' => $users[1]->id
        ]);
    }
}