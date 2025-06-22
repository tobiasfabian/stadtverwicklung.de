<?php

use Kirby\Filesystem\F;

class ProxyCache extends Kirby\Cache\FileCache
{
		public function retrieve(string $key): Kirby\Cache\Value|null
		{
			  $file  = $this->file($key);
			  $value = F::read($file);

			  return $value ? Kirby\Cache\Value::fromArray([
					'value' => $value,
				]) : null;
		}

		public function set(string $key, $value, int $minutes = 0): bool
		{
				return F::write($this->file($key), $value);
		}

}
