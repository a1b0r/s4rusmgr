<?php

namespace App\Action;

use App\Domain\User\Service\UserCreator;
use App\Domain\User\Service\UserUpdater;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Action
 */
final class UserCreateAction
{
    /**
     * @var UserCreator
     */
    private $userCreator;

    /**
     * @var UserUpdater
     */
    private $userUpdater;

    /**
     * The constructor.
     *
     * @param UserCreator $userCreator The user creator
     */
    public function __construct(UserCreator $userCreator, UserUpdater $userUpdater)
    {
        $this->userCreator = $userCreator;
        $this->userUpdater = $userUpdater;
    }

    /**
     * Invoke.
     *
     * @param ServerRequestInterface $request The request
     * @param ResponseInterface $response The response
     *
     * @return ResponseInterface The response
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        
        $data = $request->getParsedBody();
        if(isset($data[0])){
            foreach($data as $dataset){
                if(!isset($dataset['id'])){
                    $result[] = $this->userCreator->createUser($dataset);
                }else{
                    $result[] = $this->userUpdater->updateUser($dataset);
                    
                }
            }
        }else{
            $userId = $this->userCreator->createUser((array)$data);
            $result = ['id' => $userId];
        }
        
        $response->getBody()->write((string)json_encode($result));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }
}