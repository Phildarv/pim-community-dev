<?php

declare(strict_types=1);

namespace Akeneo\Connectivity\Connection\Application\Webhook\Validation;

use Akeneo\Connectivity\Connection\Domain\Settings\Persistence\Repository\ConnectionRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * @author    Willy Mesnage <willy.mesnage@akeneo.com>
 * @copyright 2020 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class ConnectionMustExistValidator extends ConstraintValidator
{
    /** @var ConnectionRepository */
    private $repository;

    public function __construct(ConnectionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof ConnectionMustExist) {
            throw new UnexpectedTypeException($constraint, ConnectionMustExist::class);
        }

        if (null === $this->repository->findOneByCode($value)) {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}
