#!/usr/bin/env python
try: import unittest2 as unittest #for Python <= 2.6
except: import unittest
import sys, urllib2
from selenium import webdriver
import subprocess
import sys
import os.path

ROOT = 'http://localhost:8001'

class FunctionalTest(unittest.TestCase):

    @classmethod
    def setUpClass(self):
        self.web2py = start_web2py_server()
        self.browser = webdriver.Firefox()
        self.browser.implicitly_wait(1)

    @classmethod    
    def tearDownClass(self):
        self.browser.close()
        self.web2py.kill()

    def get_response_code(self, url):
        """Returns the response code of the given url

        url     the url to check for 
        return  the response code of the given url
        """
        handler = urllib2.urlopen(url)
        return handler.getcode()


def start_web2py_server():
    #noreload ensures single process
    print os.path.curdir    
    return subprocess.Popen([
            'python', '../../web2py.py', 'runserver', '-a "passwd"', '-p 8001'
    ])

def run_functional_tests(pattern=None):
    print 'running tests'
    if pattern is None:
        tests = unittest.defaultTestLoader.discover('fts')
    else:
        pattern_with_globs = '*%s*' % (pattern,)
        tests = unittest.defaultTestLoader.discover('fts', pattern=pattern_with_globs)

    runner = unittest.TextTestRunner()
    runner.run(tests)

if __name__ == '__main__':
    if len(sys.argv) == 1:
        run_functional_tests()
    else:
        run_functional_tests(pattern=sys.argv[1])
