<?php

$input = $request->get('name', 'World');

$response->setContent(sprintf('Goodbye %s', htmlspecialchars($input, ENT_QUOTES, 'UTF-8')));
