<?php

namespace Core\Auth\Tests\Feature;

use Core\Base\Tests\ApiTestCase;

class AuthenticationTest extends ApiTestCase
{
    /**
     * the base url
     *
     * @var string
     */
    protected $base_url;

    /**
     * setting up
     *
     * @throws \ReflectionException
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->base_url = $this->getApiBaseUrl() . 'auth/';
    }

    /**
     * email and password should be provided
     *
     * @return void
     */
    public function testMustEnterEmailAndPassword()
    {
        $this->json('POST', $this->base_url . 'login', [], $this->getHeaders(false))
             ->assertStatus(422)
             ->assertJson([
                'is_success' => false,
                'status_code' => 422,
                'message' => 'The given data was invalid.',
                'errors' => [
                    ['field' => 'email', 'message' => 'The email field is required.', 'code' => 4204],
                    ['field' => 'password', 'message' => 'The password field is required.', 'code' => 4204],
                ]
             ]);
    }

    /**
     * email and password should be correct
     *
     * @return void
     */
    public function testMustEnterCorrectEmailAndPassword()
    {
        $this->json('POST', $this->base_url . 'login', $this->getUserCredentials(), $this->getHeaders(false))
            ->assertStatus(401)
            ->assertJson([
                'is_success' => false,
                'status_code' => 401,
                'message' => 'The provided credentials are incorrect.',
                'errors' => []
            ]);
    }

    /**
     * login with right credentials
     *
     * @return void
     */
    public function testSuccessfulLogin()
    {
        $this->createUser();
        $data         = $this->getUserCredentials();
        $json         = $this->getJsonStructure();
        $json['data'] = ['token'];

        $this->json('POST', $this->base_url . 'login', $data, $this->getHeaders(false))
             ->assertStatus(200)
             ->assertJsonStructure($json);
    }

    /**
     * logout the user
     *
     * @return void
     */
    public function testItShouldLogoutAuthUser()
    {
        $this->json('GET', $this->base_url . 'logout', [], $this->getHeaders())
            ->assertStatus(200)
            ->assertJsonStructure($this->getJsonStructure());
    }

    // below tests are overridden from the ApiTestCase to avoid default behavior //
    public function testItShouldGetListingOfTheResource() {
        $this->assertTrue(true);
    }

    public function testItShouldStoreNewlyCreatedResource() {
        $this->assertTrue(true);
    }

    public function testItShouldGetSpecifiedResource() {
        $this->assertTrue(true);
    }

    public function testItShouldUpdateSpecifiedResource() {
        $this->assertTrue(true);
    }

    public function testItShouldRemoveSpecifiedResource() {
        $this->assertTrue(true);
    }
}
