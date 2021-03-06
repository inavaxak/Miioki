<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/

declare(strict_types=1);

namespace pocketmine\network\mcpe\protocol\types;

use pocketmine\utils\UUID;

class SkinData{
    public const ARM_SIZE_SLIM = "slim";
	public const ARM_SIZE_WIDE = "wide";

	/** @var string */
	private $skinId;
	/** @var string */
	private $resourcePatch;
	/** @var SkinImage */
	private $skinImage;
	/** @var SkinAnimation[] */
	private $animations;
	/** @var SkinImage */
	private $capeImage;
	/** @var string */
	private $geometryData;
	/** @var string */
	private $animationData;
	/** @var bool */
	private $persona;
	/** @var bool */
	private $premium;
	/** @var bool */
	private $personaCapeOnClassic;
	/** @var string */
	private $capeId;
	/** @var string */
	private $fullSkinId;
	/** @var string */
	private $armSize;
	/** @var string */
	private $skinColor;
	/** @var int */
	private $personaPieces;
	/** @var int */
	private $pieceTintColors;
	/** @var bool */
	private $isVerified;
	
	/**
	 * @param SkinAnimation[] $animations
	 */
	public function __construct(string $skinId, string $resourcePatch, SkinImage $skinImage, array $animations = [], SkinImage $capeImage = null, string $geometryData = "", string $animationData = "", bool $premium = false, bool $persona = false, bool $personaCapeOnClassic = false, string $capeId = "", ?string $fullSkinId = null, string $armSize = "", string $skinColor = "", array $personaPieces = [], array $pieceTintColors = [], bool $isVerified = false){
		$this->skinId = $skinId;
		$this->resourcePatch = $resourcePatch;
		$this->skinImage = $skinImage;
		$this->animations = $animations;
		$this->capeImage = $capeImage;
		$this->geometryData = $geometryData;
		$this->animationData = $animationData;
		$this->premium = $premium;
		$this->persona = $persona;
		$this->personaCapeOnClassic = $personaCapeOnClassic;
		$this->capeId = $capeId;
		//this has to be unique or the client will do stupid things
		$this->fullSkinId = $fullSkinId ?? UUID::fromRandom()->toString();
		$this->armSize = $armSize;
		$this->skinColor = $skinColor;
		$this->personaPieces = $personaPieces;
		$this->pieceTintColors = $pieceTintColors;
		$this->isVerified = $isVerified;
	}
	
	public function setVerified(bool $verified) : void
	{
	    $this->isVerified = $verified;
	}
	
	public function isVerified() : bool{
	    return $this->isVerified;
	}
	
	public function getArmSize() : string{
	    return $this->armSize;
	}
	
	public function getSkinColor() : string{
	    return $this->skinColor;
	}
	
	public function getPersonaPieces() : array{
	    return $this->personaPieces;
	}
	
	public function getPieceTintColors() : array{
	    return $this->pieceTintColors;
	}
	
	public function getSkinId() : string{
		return $this->skinId;
	}

	public function getResourcePatch() : string{
		return $this->resourcePatch;
	}

	public function getSkinImage() : SkinImage{
		return $this->skinImage;
	}

	/**
	 * @return SkinAnimation[]
	 */
	public function getAnimations() : array{
		return $this->animations;
	}

	public function getCapeImage() : SkinImage{
		return $this->capeImage;
	}

	public function getGeometryData() : string{
		return $this->geometryData;
	}

	public function getAnimationData() : string{
		return $this->animationData;
	}

	public function isPersona() : bool{
		return $this->persona;
	}

	public function isPremium() : bool{
		return $this->premium;
	}

	public function isPersonaCapeOnClassic() : bool{
		return $this->personaCapeOnClassic;
	}

	public function getCapeId() : string{
		return $this->capeId;
	}

	public function getFullSkinId() : string{
		return $this->fullSkinId;
	}
}
