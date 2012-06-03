# -*- coding: utf-8 -*- 
from applications.filemanager.modules.elw2p import connector
from gluon.globals import Response, Session, Request
from gluon.tools import Service
#########################################################################
## This is a samples controller
## - index is the default action of any application
## - user is required for authentication and authorization
## - download is for downloading files uploaded in the db (does streaming)
## - call exposes all registered services (none by default)
######################################################################### 
global RESPONSE , REQUEST, SESSION ,db
##TODO Document ALL
REQUEST=Request()
REQUEST=request
SESSION=Session()
SESSION=session
RESPONSE=Response()
RESPONSE=response
 
service = Service(globals())

def index():

    return dict()

def call():
    """
    exposes services. for example:
    http://..../[app]/default/call/jsonrpc
    decorate with @services.jsonrpc the functions to expose
    supports xml, json, xmlrpc, jsonrpc, amfrpc, rss, csv
    """
    SESSION.forget()
    return service()




def web2py_elcon():
    cont=connector({
        'root': request.folder+'static/edsource',
        #'URL': 'http://localhost:8080'+URL(c='default',r=Request,f='call',args=['json','json_connector']),
        'URL':'http://'+request.env['http_host']+'/'+request.application+'/static/edsource',
        'debug': False,                   # send debug information
        'dirSize': False,                 # calculate directory sizes
        'dotFiles': True,                # show files beginning with dot
        'defaults':{'read':True,
                    'write':True,
                    'rm':True}
        
        }
    )                                 

    possible_fields = ['cmd', 'target', 'targets[]', 'current', 'tree', 'name', 
                    'content', 'src', 'dst', 'cut', 'init', 'type', 'width', 'height']

    if REQUEST.env.request_method == 'GET':
            for field in possible_fields:
                    if field in REQUEST.get_vars:
                            cont._request[field] = REQUEST.get_vars[field]

    if REQUEST.env.request_method == 'POST':
            for field in possible_fields:
                    if field in REQUEST.post_vars:
                            cont._request[field] = REQUEST.post_vars[field]

#       print REQUEST.POST['current']
    cont.run()
    #print "status = %s" %cont.status1
    RESPONSE.status = cont.status1
#    print "content = " + cont.cont
    print cont.head
#    for key in cont.head :
##       print "key header = " + key
#            resp.__setitem__(key, cont.head[key])
#       HttpResponse.status =status
    RESPONSE.headers=cont.head
    return cont.cont


