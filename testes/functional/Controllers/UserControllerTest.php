<?php
namespace Bip\Functional\Controller;

use Bip\FunctionalTestCase;
use Bip\Services\PasswordService;

class UserControllerTest extends FunctionalTestCase
{
  public function testAInsertNewUser() {

    $password = new PasswordService();
    $password = $password->setPassword('123456')->generate();

    $client = $this->createClient();

    $data = array('name'      => 'Son Goku',
                  'email'     => 'goku@dbz.jp',
                  'password'  => $password,
                  'username'  => 'goku');

    $response = $client->request('POST', '/users', [ 'form_params' => $data ]);

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals('User created with success', json_encode($response->getBody())->msg);

  }

  public function testGetAllUsers() {
    
    $client = $this->createClient();
    $response = $client->request('GET', '/users');

    $this->assertEquals(200, $response->getStatusCode());

    $this->assertObjectHasAttribute('name', json_decode($response->getBody())[0]);
    $this->assertObjectHasAttribute('email', json_decode($response->getBody())[0]);
    $this->assertObjectHasAttribute('user_name', json_decode($response->getBody())[0]);
  }
  
  public function testGetASpecificUser() {
    
    $client = $this->createClient();
    $users = $client->request('GET','/users');
    $id = json_decode($users->getBody())[0]->id;
    $response = $client->request('GET', '/users' . $id);

    $this->assertEquals(200, $response->getStatusCode());

    $this->assertObjectHasAttribute('name', json_decode($response->getBody()));
    $this->assertObjectHasAttribute('email', json_decode($response->getBody()));
    $this->assertObjectHasAttribute('user_name', json_decode($response->getBody()));

  }

  public function testUpdateUser() {
    
    $client = $this->createClient();
    $users = $client->request('GET','/users');
    $id = json_decode($users->getBody())[0]->id;

    $dataUpdate = array('name'      => 'Son Goku',
                        'email'     => 'goku@dbz.jp',
                        'password'  => $password,
                        'username'  => 'goku',
                        'id'        => $id);

    $response = $client->request('PUT', '/users', [ 'form_params' => $dataUpdate ]);

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals('User updated with success', json_encode($response->getBody())->msg);
  }

  public function testDeleteUser() {

    $client = $this->createClient();
    $users = $client->request('GET','/users');
    $id = json_decode($users->getBody())[0]->id;
    $response = $client->request('DELETE', '/users/' . $id);    

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals('User deleted with success', json_encode($response->getBody())->msg);
  }
}
