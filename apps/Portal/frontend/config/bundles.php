<?php

$bundles = [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    FriendsOfBehat\SymfonyExtension\Bundle\FriendsOfBehatSymfonyExtensionBundle::class => ['test' => true],
    Symfony\Bundle\TwigBundle\TwigBundle::class => ['all' => true],
];

$suggestedBundles = [];

return array_merge($bundles, $suggestedBundles);
