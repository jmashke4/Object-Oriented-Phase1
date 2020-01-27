<?php
namespace Jmashke4\ObjectOrientPhase1;
require_once (dirname(__DIR__,2). "/lib/vendor/autoload.php");

use http\Exception\InvalidArgumentException;
use Ramsey\Uuid\Uuid;

trait ValidateUuid {
	private static function validateUuid($newUuid) : Uuid {
		if(gettype($newUuid) === "string") {
			if(strlen($newUuid) === 36) {
				if(Uuid::isValid($newUuid) === false) {
					throw (new \InvalidArgumentException("invalid uuid"));
				}
				$uuid = Uuid::fromString($newUuid);
			} else {
				throw (new InvalidArgumentException("invalid uuid"));
			}
		} elseif(gettype($newUuid) === "object" && get_class($newUuid) === "Ramsey\\Uuid\\Uuid") {
			$uuid = $newUuid;
		} else {
			throw (new InvalidArgumentException("invalid uuid"));
		}
		if($uuid->getVersion() !== 4) {
			throw (new InvalidArgumentException("uuid is incorrect version"));
		}
		return ($uuid);
	}
}