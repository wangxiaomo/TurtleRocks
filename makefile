main: clean power
	@echo "clean them all"

clean:
	rm -rf ./cache/* ./templates_c/*
	find . -name "*.swp" | xargs rm -f

power:
	chmod a+w cache templates_c upload
