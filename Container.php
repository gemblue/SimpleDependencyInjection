<?php
/**
 * Simple DI
 * 
 * Very simple Dependency Injector/Service Container.
 * For learning purpose.
 * 
 * @author Gemblue
 */
class Container {
    
    /**
     * Resolve class, instantiate automate by reflection.
     *
     * @return object
     */
    public function resolve(string $className) 
    {
        // Create a reflection.
        $reflector = new ReflectionClass($className);
        
        // Get it's constructor.
        $constructor = $reflector->getConstructor();
        
        // Search dependency and resolve. By constructor parameters.
        $args = $this->getDependencies($constructor->getParameters());

        return $reflector->newInstanceArgs($args); 
    }

    /**
     * Find the dependencies, if class then resolve.
     * Run resolve recursively.
     *
     * @return object
     */
    public function getDependencies($parameters)
    {
        $args = [];

        foreach ($parameters as $parameter) 
        {
            // Get class from param.
            $isClass = $parameter->getClass();
            
            // Is param a class?
            if ($isClass) {
                // Yes, resolve param class, create instance, call resolve.
                $type = $parameter->name;

                // Assign to args, resolve.
                $args[] = $this->resolve($type); // Recursively.
            } else {
                // Just assign default value.
                $args[] = $parameter->getDefaultValue();
            }
        }

        return $args;
    }
}