<?php

include __DIR__ . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Discord\Discord;
use Discord\WebSockets\Event;
use Discord\Parts\Channel\Message;

$discord = new Discord([
  "token" => $_ENV["DISCORD_BOT_TOKEN"],
]);

$discord->on("ready", function (Discord $discord) {

  $discord->on(Event::MESSAGE_CREATE, function (Message $message, Discord $discord) {
      if (strtolower($message->content) == "hi") {
        $message->reply("Hi " . $message->author . "! How i can help you?");
        return;
      }
  });
});

$discord->run();
