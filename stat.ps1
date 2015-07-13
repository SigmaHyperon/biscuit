dir . -Recurse -name | foreach{(GC $_).Count} | measure-object -sum
pause