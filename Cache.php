<?php
	class Cache {
		protected array $memory = [];
		public function has(string $key): bool {
			return isset($this->memory[$key]);
		}
		public function get(string $key): array {
			return $this->memory[$key];
		}
		public function set(string $key, array $value): void {
			$this->memory[$key] = $value;
		}
	}
