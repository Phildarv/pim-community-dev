<?php

declare(strict_types=1);

namespace Akeneo\Connectivity\Connection\Domain\ErrorManagement\Model\Write;

use Akeneo\Connectivity\Connection\Domain\ErrorManagement\Model\ValueObject\ErrorType;

/**
 * @author    Willy Mesnage <willy.mesnage@akeneo.com>
 * @copyright 2020 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
interface ApiErrorInterface
{
    public function content(): string;

    public function type(): ErrorType;

    /**
     * @return array{content: string, error_datetime: string}
     */
    public function normalize(): array;
}
