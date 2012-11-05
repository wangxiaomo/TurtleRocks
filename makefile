main: clean
	@echo "clean them all"

clean:
	rm -rf ./cache/* ./templates_c/*
	find . -name "*.swp" | xargs rm -f
