<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/src',
        __DIR__ . '/tests',
        __DIR__ . '/util',
    ]);

    // register a single rule
    $rectorConfig->skip([
        \Rector\Php80\Rector\Class_\ClassPropertyAssignToConstructorPromotionRector::class,
        \Rector\Php74\Rector\Property\TypedPropertyRector::class,
        \Rector\TypeDeclaration\Rector\Property\TypedPropertyFromAssignsRector::class,
        \Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector::class,
        \Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictGetterMethodReturnTypeRector::class,
        \Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictSetUpRector::class,
        \Rector\TypeDeclaration\Rector\Param\ParamTypeFromStrictTypedPropertyRector::class,
        \Rector\Php80\Rector\FunctionLike\UnionTypesRector::class
    ]);

    // define sets of rules
    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_80,
        \Rector\PHPUnit\Set\PHPUnitSetList::PHPUNIT_60,
        \Rector\PHPUnit\Set\PHPUnitSetList::PHPUNIT_70,
        \Rector\PHPUnit\Set\PHPUnitSetList::PHPUNIT_80,
        \Rector\PHPUnit\Set\PHPUnitSetList::PHPUNIT_90,
        \Rector\PHPUnit\Set\PHPUnitSetList::PHPUNIT_91,
    ]);
};
