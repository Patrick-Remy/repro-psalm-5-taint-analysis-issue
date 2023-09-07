# Repro for Bug in Taint Analysis in Psalm 5.0

## How to

### Tainted sql not found with v5
1. Install psalm v5 `docker run --rm -v $PWD:/app composer composer install --ignore-platform-reqs`
2. Run analaysis `vendor/bin/psalm -c psalm.xml`
3. You'll get the output that no errors are found

### Tainted sql found with v4
1. Change `composer.json` the line to `"vimeo/psalm": "^4"`
2. Run again `docker run --rm -v $PWD:/app composer composer update -W --ignore-platform-reqs`
3. Run analaysis `vendor/bin/psalm -c psalm.xml`
4. You'll receive
  ```
  ERROR: TaintedSql - example.php:6:18 - Detected tainted SQL (see https://psalm.dev/244)
    $bad_data-example.php:81 - example.php:9:9
  execSql($bad_data);

    call to execSql - example.php:9:9
  execSql($bad_data);


  ------------------------------
  1 errors found
  ------------------------------
  ```
