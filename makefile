main: clean permission
	@echo "clean them all"

clean:
	rm -rf ./cache/* ./templates_c/*
	find . -name "*.swp" | xargs rm -f

permission:
	chmod a+w cache templates_c upload
