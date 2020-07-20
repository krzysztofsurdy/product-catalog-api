<?php
declare(strict_types=1);

namespace App\Cart\Application\QueryHandler;

use App\Cart\Application\Query\GetCartQuery;
use App\Cart\Domain\Cart;
use App\Cart\Domain\Exception\CartNotFoundException;
use App\Cart\Domain\Factory\CartFactory;
use App\Cart\Infrastructure\CartRepositoryInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class GetCartQueryHandler implements MessageHandlerInterface
{
    private CartRepositoryInterface $cartRepository;

    public function __invoke(GetCartQuery $query): Cart
    {
        $cartData = $this->cartRepository->get($query->getId());

        if (!empty($cartData)) {
            return CartFactory::createFromArray($cartData);
        }

        throw new CartNotFoundException($query->getId());
    }
}
