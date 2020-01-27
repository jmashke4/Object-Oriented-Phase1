<?php
namespace Jmashke4\ObjectOrientPhase1;
require_once("autoload.php");
require_once (dirname(__DIR__). "/lib/vendor/autoload.php");

use Ramsey\Uuid\Uuid;

class Author {
	use ValidateUuid;
	use ValidateDate;
	private $authorId;
	private $authorActivationToken;
	private $authorAvatarUrl;
	private $authorEmail;
	private $authorHash;
	private $authorUserName;

	public function __construct($newAuthorId, $newAuthorActivationToken, $newAuthorAvatarUrl, $newAuthorEmail, $newAuthorHash,  $newAuthorUserName) {
		try {
			$this->setAuthorId($newAuthorId);
			$this->setAuthorActivationToken($newAuthorActivationToken);
			$this->setAuthorAvatarUrl($newAuthorAvatarUrl);
			$this->setAuthorEmail($newAuthorEmail);
			$this->setAuthorHash($newAuthorHash);
			$this->setAuthorUserName($newAuthorUserName);
		}
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	public function getAuthorId() : Uuid {
		return $this->authorId;
	}

	public function setAuthorId($authorId): void {
		try {
			$uuid = self::validateUuid($newAuthorId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->authorId = $uuid;
	}

	public function getAuthorActivationToken() {
		return $this->authorActivationToken;
	}

	public function getAuthorAvatarUrl() {
		return $this->authorAvatarUrl;
	}

	public function getAuthorEmail() {
		return $this->authorEmail;
	}

	public function getAuthorHash() {
		return $this->authorHash;
	}

	public function getAuthorUserName() {
		return $this->authorUserName;
	}


	public function setAuthorActivationToken($authorActivationToken): void {
		$this->authorActivationToken = $authorActivationToken;
	}

	public function setAuthorAvatarUrl($authorAvatarUrl): void {
		$this->authorAvatarUrl = $authorAvatarUrl;
	}

	public function setAuthorEmail($authorEmail): void {
		$this->authorEmail = $authorEmail;
	}

	public function setAuthorHash($authorHash): void {
		$this->authorHash = $authorHash;
	}

	public function setAuthorUserName($authorUserName): void {
		$this->authorUserName = $authorUserName;
	}

}