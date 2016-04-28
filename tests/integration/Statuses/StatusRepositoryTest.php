<?php
use App\Repositories\StatusesRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class StatusRepositoryTest extends \Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;

    protected function _before()
    {
        $this->repo = new StatusesRepository();
    }



    /** @test */
    public function it_gets_all_statuses_for_user()
    {
        //given I have two users
        $users = TestDummy::times(2)->create('App\User');

        //and statuses for both of them
        TestDummy::times(2)->create('App\Status', [
                'user_id' => $users[0]->id,
                'body' => 'His status'
            ]);

        //when I fetches statuses for one user
        $statusesForUser = $this->repo->getStatusesForUser($users[0]);

        //then I should receive only the relevant ones
        $this->assertCount(2, $statusesForUser);
        $this->assertEquals('His status', $statusesForUser[0]->body);

    }

    /** @test */
    public function it_saves_a_status_for_user(){
        //given I have an unsaved status
        $status = TestDummy::create('App\Status', [
                'body' => 'His status'
            ]);

        //and an existing user
        $user = TestDummy::create('App\User',[
            ]);

        //When I try to persist this status
        $savedStatus = $this->repo->save($status, $user->id);

        //Then it should have been saved
        $this->tester->seeRecord('statuses', [
                'body' => 'His status'
            ]);

        //And the status should have the correct user_id
        $this->assertEquals($savedStatus->user_id, $user->id);
    }
}