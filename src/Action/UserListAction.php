<?php

namespace App\Action;

use App\Domain\User\Service\UserLister;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Action
 */
final class UserListAction
{
    /**
     * @var UserLister
     */
    private $userLister;

    /**
     * The constructor.
     *
     * @param UserLister $userLister The user Lister
     */
    public function __construct(UserLister $userLister)
    {
        $this->userLister = $userLister;
    }

    /**
     * Invoke.
     *
     * @param ServerRequestInterface $request The request
     * @param ResponseInterface $response The response
     * @param array<mixed> $args The route arguments
     *
     * @return ResponseInterface The response
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args = []
    ): ResponseInterface {
        // Invoke the Domain (application service) with inputs and keep the result
        $users = $this->userLister->getUserList();

        // // Transform the result into the JSON representation
        // $result = [
        //     'user_id' => $user->id,
        //     'first_name' => $user->firstName,
        //     'last_name' => $user->lastName,
        //     'active' => $user->active,
        // ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($users));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
