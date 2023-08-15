<?php

namespace Core;

interface Middleware {
	static function handle(): void;
}