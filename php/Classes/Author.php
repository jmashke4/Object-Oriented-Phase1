<?php

class Author {
	private $authorId;
	private $authorActivationToken;
	private $authorAvatarUrl;
	private $authorEmail;
	private $authorHash;
	private $authorUserName;

	public function __construct(float $newAuthorId, float $newAuthorActivationToken, float $newAuthorAvatarUrl, float $newAuthorEmail, float $newAuthorHash, float $newAuthorUserName) {
		$this->setAuthorId($newAuthorId);
		$this->setAuthorActivationToken($newAuthorActivationToken);
		$this->setAuthorAvatarUrl($newAuthorAvatarUrl);
		$this->setAuthorEmail($newAuthorEmail);
		$this->setAuthorHash($newAuthorHash);
		$this->setAuthorUserName($newAuthorUserName);
	}


	/**
	 * getter for authorId
	 */
	public function getAuthorId() {
		return $this->authorId;
	}


	/**
	 * getter for authorActivationToken
	 */
	public function getAuthorActivationToken() {
		return $this->authorActivationToken;
	}

	/**
	 * getter for authorAvatarUrl
	 */
	public function getAuthorAvatarUrl() {
		return $this->authorAvatarUrl;
	}

	/**
	 * getter for authorEmail
	 */
	public function getAuthorEmail() {
		return $this->authorEmail;
	}

	/**
	 * getter for authorHash
	 */
	public function getAuthorHash() {
		return $this->authorHash;
	}

	/**
	 * getter for authorUserName
	 */
	public function getAuthorUserName() {
		return $this->authorUserName;
	}

	/**
	 * @param mixed $authorId
	 */
	public function setAuthorId($authorId): void {
		$this->authorId = $authorId;
	}

	/**
	 * @param mixed $authorActivationToken
	 */
	public function setAuthorActivationToken($authorActivationToken): void {
		$this->authorActivationToken = $authorActivationToken;
	}

	/**
	 * @param mixed $authorAvatarUrl
	 */
	public function setAuthorAvatarUrl($authorAvatarUrl): void {
		$this->authorAvatarUrl = $authorAvatarUrl;
	}

	/**
	 * @param mixed $authorEmail
	 */
	public function setAuthorEmail($authorEmail): void {
		$this->authorEmail = $authorEmail;
	}

	/**
	 * @param mixed $authorHash
	 */
	public function setAuthorHash($authorHash): void {
		$this->authorHash = $authorHash;
	}

	/**
	 * @param mixed $authorUserName
	 */
	public function setAuthorUserName($authorUserName): void {
		$this->authorUserName = $authorUserName;
	}

}