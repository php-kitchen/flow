<?php

namespace PHPKitchen\Flow\Domain;

use PHPKitchen\Flow\Contract;
use Throwable;

/**
 * Represents base implementation of domain strategy.
 *
 * Use this class as a base class for any of your domain strategies.
 *
 * @author Dmitry Kolodko <prowwid@gmail.com>
 * @since 1.0
 */
abstract class Strategy implements Contract\Domain\Strategy {
    protected const ERROR_NOT_HANDLED = false;
    protected const ERROR_HANDLED = true;

    /**
     * Magic method that execute strategy.
     *
     * @return bool|void|mixed strategy result.
     * @throws Throwable on strategy failure.
     *
     * @since 1.0
     */
    public function __invoke() {
        $this->before();

        try {
            $result = $this->do();
        } catch (Throwable $error) {
            if ($this->onError($error) === self::ERROR_HANDLED) {
                // @TODO think about using named value object t to identify failure
                $result = false;
            } else {
                throw $error;
            }
        }

        $this->after();

        return $result;
    }

    /**
     * Hook that executed right before {@link do}.
     * You can override this method to put any logic that should be
     * executed right before strategy body.
     *
     * @since 1.0
     */
    protected function before(): void {
        return;
    }

    /**
     * Hook that executed right after {@link do} if no failure occurs.
     * You can override this method to put any logic that should be
     * executed right after strategy body.
     *
     * Note: this hook won't be called if {@link do} throws error.
     *
     * @see onError
     * @since 1.0
     */
    protected function after(): void {
        return;
    }

    /**
     * Hook that executed if error occurs during {@link do} or {@link after}.
     * Note: this method shout either return {@link ERROR_HANDLED} constant value if
     * you handle error to not throw it again or {@link ERROR_NOT_HANDLED} to let handle
     * error in a higher layers.
     *
     * @property Throwable $error error that occurred during strategy execution.
     *
     * @return bool either {@link ERROR_NOT_HANDLED} or {@link ERROR_HANDLED} constants.
     *
     * @since 1.0
     */
    protected function onError(Throwable $error): bool {
        return self::ERROR_NOT_HANDLED;
    }
}