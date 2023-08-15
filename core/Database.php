<?php

namespace Core;

use PDO;
use PDOStatement;

class Database {
	protected PDO $connection;
	protected PDOStatement $statement;

	public function __construct(array $config, ?string $username = 'root', ?string $password = null, ?array $options = null) {
		$defaultOptions = [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		];
		$options = $options ?? $defaultOptions;

		$dsn = 'mysql:' . http_build_query($config, '', ';');
		$this->connection = new PDO($dsn, $username, $password, $options);
	}

	public function query(string $query, ?array $params = null): self {
		$this->statement = $this->connection->prepare($query);
		$this->statement->execute($params);

		return $this;
	}

	public function get(): array|false {
		return $this->statement->fetchAll();
	}

	public function find(): mixed {
		return $this->statement->fetch();
	}

	public function findOrFail(): mixed {
		$result = $this->find();

		if(! $result) {
			Router::abort();
		}

		return $result;
	}
}