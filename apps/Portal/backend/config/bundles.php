<?php

$bundles = [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class                              => ['all' => true],
    FriendsOfBehat\SymfonyExtension\Bundle\FriendsOfBehatSymfonyExtensionBundle::class => ['test' => true],
];

$suggestedBundles = [];

return array_merge($bundles, $suggestedBundles);
