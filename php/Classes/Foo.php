<?php
			Class Author {
				use ValidateUuid;
				private $authorId;
				private $authorActivationToken;
				private $avatarUrl;
				private $authorEmail;
				private $authorHash;
				private  $authorUserName;

				/**
				 * @return mixed
				 */
				public function getAuthorId(): Uuid{
					return $this->authorId;
				}

				/**
				 * @param mixed $newauthorId
				 */
				public function setAuthorId($newauthorId): void {
					try {
								$uuid = self::validateUuid($newauthorId);
					} catch (\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
								$exceptionType = get_class(exception);
								throw(new $exceptionType($exception->getMessage(),0, $exception));
					}
					$this->authorId = $uuid;
				}
			}
?>