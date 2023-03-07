<?php

it('assert the status is 301', function () {
    $response = $this->get('/');

    $response->assertStatus(301);
});


