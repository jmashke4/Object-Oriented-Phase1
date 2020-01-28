<?php
namespace Jmashke4\ObjectOrientPhase1;
require_once("autoload.php");
require_once (dirname(__DIR__). "/lib/vendor/autoload.php");
use Ramsey\Uuid\Uuid;

/**
 * Object oriented Phase 1
 *
 * This is my Object Oriented Phase 1 project
 *
 * @author Josh Mashke <joshmashke@gmail.com>
 */

class Author {
	use ValidateUuid;
	use ValidateDate;
	/**
	 * id for author : this is the primary key
	 */
	private $authorId;
	/**
	 * activation token for author
	 */
	private $authorActivationToken;
	/**
	 * Avatar Url for author
	 */
	private $authorAvatarUrl;
	/**
	 * author's email
	 */
	private $authorEmail;
	/**
	 * Hash for the author
	 */
	private $authorHash;
	/**
	 * author's Username
	 */
	private $authorUserName;

	/**
	 * Author constructor.
	 * @param $newAuthorId
	 * @param $newAuthorActivationToken
	 * @param $newAuthorAvatarUrl
	 * @param $newAuthorEmail
	 * @param $newAuthorHash
	 * @param $newAuthorUserName
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if a data type violates a data hint
	 * @throws \Exception if some other exception occurs
	 */
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

	/**
	 * accessor method for author id
	 */

	public function getAuthorId() : Uuid {
		return $this->authorId;
	}

	/**
	 * mutator method for author id
	 *
	 *  @param  Uuid| string $newAuthorId value of new author id
	 * @throws \RangeException if $newAuthoreId is not positive
	 * @throws \TypeError if the author Id is not
	 */

	public function setAuthorId($newAuthorId): void {
		try {
			$uuid = self::validateUuid($newAuthorId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->authorId = $uuid;
	}

	/**
	 * accessor method for activation token
	 *
	 * @return string value of activation token
	 */

	public function getAuthorActivationToken() : ?string {
		return $this->authorActivationToken;
	}

	/**
	 * mutator method for activation token
	 *
	 * @param string $newActivationToken
	 * @throws \InvalidArgumentException if token is not a string or insecure
	 * @throws \RangeException if token is not exactly 32 characters
	 * @throws \TypeError if the activation token is not a string
	 */

	public function setAuthorActivationToken(?string $newAuthorActivationToken) : void {
		if($newAuthorActivationToken === null) {
			$this->authorActivationToken = null;
			return;
		}
		$newAuthorActivationToken = strtolower(trim($newAuthorActivationToken));
		if(ctype_xdigit($newAuthorActivationToken) !== 32) {
			throw (new\RangeException("user activation token has to be 32"));
		}
		$this->authorActivationToken = $newAuthorActivationToken;
	}

	/**
	 * accessor method for author email
	 *
	 * @return mixed
	 */

	public function getAuthorEmail() {
		return $this->authorEmail;
	}

	/**
	 * mutator method for author Email
	 *
	 * @param string $newProfileEmail new value of email
	 * @throws \InvalidArgumentException if $newEmail is not a valid email or insecure
	 * @throws \RangeException if $newEmail is > 128 characters
	 * @throws \TypeError if $newEmail is not a string
	 */

	public function setAuthorEmail(string $newAuthorEmail): void {
		$newAuthorEmail = trim($newAuthorEmail);
		$newAuthorEmail = filter_var($newAuthorEmail, FILTER_VALIDATE_EMAIL);
		if(empty($newAuthorEmail) === true) {
			throw (new \InvalidArgumentException("email is empty or insecure"));
		}
		if(strlen($newAuthorEmail) > 128) {
			throw (new \RangeException("email is too large"));
		}
		$this->authorEmail = $newAuthorEmail;
	}

	/**
	 * accessor method for author Hash
	 *
	 * @return string value of hash
	 */

	public function getAuthorHash() {
		return $this->authorHash;
	}

	/**
	 * mutator method for author hash password
	 *
	 * @param string $newProfileHash
	 * @throws \InvalidArgumentException if the hash is not secure
	 * @throws \RangeException if the hash is not 128 characters
	 * @throws \TypeError if profile hash is not a string
	 */

	public function setAuthorHash(string $newAuthorHash) : void{
		$newAuthorHash = trim($newAuthorHash);
		if(empty($newAuthorHash) === true){
			throw (new \InvalidArgumentException("password hash empty or insecure"));
		}
		$authorHashInfo = password_get_info($newAuthorHash);
		if($authorHashInfo["algoName"] !== "argon2i") {
			throw (new \InvalidArgumentException("hash is not a valid hash"));
		}
		if(strlen($newAuthorHash) !== 97) {
			throw (new \RangeException("hash must be 97 characters"));
		}
		$this->authorHash = $newAuthorHash;
	}

	/**
	 * accessor method for author username
	 *
	 * @return authorUserName
	 */

	public function getAuthorUserName() {
		return $this->authorUserName;
	}

	/**
	 * mutator method for author username
	 *
	 * @param string $newAuthorUserName new value of Username
	 * @throws \InvalidArgumentException if $newUsername is not a string or insecure
	 * @throws \RangeException if $newUserName is > 32 characters
	 * @throws \TypeError if $newUserName is not a string
	 */

	public function setAuthorUserName (string $newUserName){
		$newUserName = trim($newUserName);
		$newUserName = filter_var($newUserName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newUserName) === true) {
			throw (new \InvalidArgumentException("username is empty or insecure"));
		}
		if(strlen($newUserName) > 32) {
			throw (new \RangeException("Username must be less than 32 characters"));
		}
		$this->authorUserName = $newUserName;
	}


	/**
	 * accessor for Avatar Url
	 *
	 * @return avatar url
	 */

	public function getAuthorAvatarUrl() {
		return $this->authorAvatarUrl;
	}
	/**
	 * @param $authorAvatarUrl
	 */

	public function setAuthorAvatarUrl(string $newAvatarUrl): void {
		$newAvatarUrl = trim($newAvatarUrl);
		if(empty($newAvatarUrl) === true) {
			throw (new \InvalidArgumentException("Avatar Url is empty"));
		}
		if(strlen($newAvatarUrl) > 255) {
			throw (new \RangeException("Avatar Url must be less than 255 character"));
		}
	}

}