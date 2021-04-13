<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * /api/v1/users?provider=DataProviderX
     *
     * @return void
     */
    public function testShouldReturnAllUsersForSpecificRightProvider()
    {

        $response = $this->get("api/v1/users?provider=DataProviderX");
        $response->assertStatus(200);
        $response->assertJson([
            'status' => true,
            "error" => null,
        ]);
        $response->assertJsonStructure(
            ['data' =>
                [
                    '*' => [
                        'parentAmount',
                        'Currency',
                        'parentEmail',
                        'statusCode',
                        'registerationDate',
                        'parentIdentification',
                        'balance',
                        'currency',
                        'email',
                        'status',
                        'created_at',
                        'id',
                    ]
                ],
                'status',
                'error'
            ]
        );
    }

    /**
     * /api/v1/users?provider=DataProviderXQWE
     *
     * @return void
     */
    public function testShouldReturnNoFoundUserInvalidProvider()
    {

        $response = $this->get("api/v1/users?provider=DataProviderXQWE");
        $response->assertStatus(404);
        $response->assertJson([
            'data' => null,
            'status' => false,
            "error" => 'no user found',
        ]);
    }

    /**
     * /api/v1/users?statusCode=authorised
     *
     * @return void
     */
    public function testShouldReturnUsersFilterByAuthorisedStatus()
    {

        $response = $this->get("api/v1/users?statusCode=authorised");
        $response->assertStatus(200);
        $response->assertJson([
            'status' => true,
            "error" => null,
        ]);
        $response->assertJsonStructure(
            ['data' =>
                [
                    '*' => [
                        'parentAmount',
                        'Currency',
                        'parentEmail',
                        'statusCode',
                        'registerationDate',
                        'parentIdentification',
                        'balance',
                        'currency',
                        'email',
                        'status',
                        'created_at',
                        'id',
                    ]
                ],
                'status',
                'error'
            ]
        );
    }

    /**
     * /api/v1/users?statusCode=refunded
     *
     * @return void
     */
    public function testShouldReturnUsersFilterByRefundedStatus()
    {

        $response = $this->get("api/v1/users?statusCode=refunded");
        $response->assertStatus(200);
        $response->assertJson([
            'status' => true,
            "error" => null,
        ]);
        $response->assertJsonStructure(
            ['data' =>
                [
                    '*' => [
                        'parentAmount',
                        'Currency',
                        'parentEmail',
                        'statusCode',
                        'registerationDate',
                        'parentIdentification',
                        'balance',
                        'currency',
                        'email',
                        'status',
                        'created_at',
                        'id',
                    ]
                ],
                'status',
                'error'
            ]
        );
    }

    /**
     * /api/v1/users?statusCode=decline
     *
     * @return void
     */
    public function testShouldReturnUsersFilterByDeclineStatus()
    {

        $response = $this->get("api/v1/users?statusCode=decline");
        $response->assertStatus(200);
        $response->assertJson([
            'status' => true,
            "error" => null,
        ]);
        $response->assertJsonStructure(
            ['data' =>
                [
                    '*' => [
                        'parentAmount',
                        'Currency',
                        'parentEmail',
                        'statusCode',
                        'registerationDate',
                        'parentIdentification',
                        'balance',
                        'currency',
                        'email',
                        'status',
                        'created_at',
                        'id',
                    ]
                ],
                'status',
                'error'
            ]
        );
    }

    /**
     * /api/v1/users?balanceMin=101&balanceMax=200
     *
     * @return void
     */
    public function testShouldReturnUsersFilterByMinMaxBalance()
    {

        $response = $this->get("api/v1/users?balanceMin=101&balanceMax=200");
        $response->assertStatus(200);
        $response->assertJson([
            'status' => true,
            "error" => null,
        ]);
        $response->assertJsonStructure(
            ['data' =>
                [
                    '*' => [
                        'parentAmount',
                        'Currency',
                        'parentEmail',
                        'statusCode',
                        'registerationDate',
                        'parentIdentification',
                        'balance',
                        'currency',
                        'email',
                        'status',
                        'created_at',
                        'id',
                    ]
                ],
                'status',
                'error'
            ]
        );
    }

    /**
     * /api/v1/users?currency=EGP
     *
     * @return void
     */
    public function testShouldReturnUsersFilterByCurrency()
    {

        $response = $this->get("api/v1/users?currency=EGP");
        $response->assertStatus(200);
        $response->assertJson([
            'status' => true,
            "error" => null,
        ]);
        $response->assertJsonStructure(
            ['data' =>
                [
                    '*' => [
                        'parentAmount',
                        'Currency',
                        'parentEmail',
                        'statusCode',
                        'registerationDate',
                        'parentIdentification',
                        'balance',
                        'currency',
                        'email',
                        'status',
                        'created_at',
                        'id',
                    ]
                ],
                'status',
                'error'
            ]
        );
    }

    /**
     * /api/v1/users?balanceMin=101&balanceMax=200&provider=DataProviderX&statusCode=decline&currency=EGP
     *
     * @return void
     */
    public function testShouldReturnUsersAllFilterAvailable()
    {

        $response = $this->get("api/v1/users?balanceMin=101&balanceMax=200&provider=DataProviderX&statusCode=decline&currency=EGP");
        $response->assertStatus(200);
        $response->assertJson([
            'status' => true,
            "error" => null,
        ]);
        $response->assertJsonStructure(
            ['data' =>
                [
                    '*' => [
                        'parentAmount',
                        'Currency',
                        'parentEmail',
                        'statusCode',
                        'registerationDate',
                        'parentIdentification',
                        'balance',
                        'currency',
                        'email',
                        'status',
                        'created_at',
                        'id',
                    ]
                ],
                'status',
                'error'
            ]
        );
    }
}


