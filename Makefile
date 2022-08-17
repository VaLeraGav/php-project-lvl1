install:
	composer install

validate:
	composer validate

brain-calc:
	./bin/brain-calc

brain-even:
	./bin/brain-even

brain-games:
	./bin/brain-games

brain-games:
	./bin/brain-gcd

brain-progression:
	./bin/brain-progression

brain-prime:
	./bin/brain-prime

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin