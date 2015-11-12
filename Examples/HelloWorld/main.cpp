#include <phpcpp.h>
#include <iostream>

void hello_world(Php::Parameters &params) {
    std::cout << "Hello " << params[0] << std::endl;
}

/**
 *  tell the compiler that the get_module is a pure C function
 */
extern "C" {
    
    /**
     *  Function that is called by PHP right after the PHP process
     *  has started, and that returns an address of an internal PHP
     *  strucure with all the details and features of your extension
     *
     *  @return void*   a pointer to an address that is understood by PHP
     */
    PHPCPP_EXPORT void *get_module() 
    {
        // static(!) Php::Extension object that should stay in memory
        // for the entire duration of the process (that's why it's static)
        static Php::Extension extension("hello_world", "1.0");

        extension.add("hello_world", hello_world, {
                Php::ByRef("d", Php::Type::String)
        });
        
        // return the extension
        return extension;
    }
}
