<?php

test('remove', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
