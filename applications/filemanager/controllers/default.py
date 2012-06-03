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
    opts={
        'root': request.folder+'static/edsource',
        #'URL': 'http://localhost:8080'+URL(c='default',r=Request,f='call',args=['json','json_connector']),
        'URL':'http://'+request.env['http_host']+'/'+request.application+'/static/edsource',
        'debug': True,                   # send debug information
        'dirSize': False,                 # calculate directory sizes
        'dotFiles': True,                # show files beginning with dot
        'fileURL':True,
        'defaults':{'read':True,
                    'write':True,
                    'rm':True},
        'noHash':True
        }
#    print opts['root']                                 
    conn = connector(opts)
    httpRequest = {}
    form = REQUEST.vars
#    print form
    for field in conn.httpAllowedParameters:
        if field in form:
            httpRequest[field] = REQUEST.vars[field]
            print field
            if field == 'upload[]':
#                print "Uploads: %s" % field 
                upFiles = {}
                cgiUploadFiles = form['upload[]']
                for up in cgiUploadFiles:
                    if up.filename:
                        upFiles[up.filename] = up.file # pack dict(filename: filedescriptor)
                httpRequest['upload[]'] = upFiles
#                print "Upfiles : "  +upFiles
    
    status, header, conn_response = conn.run(httpRequest)

    RESPONSE.status = status
    RESPONSE.headers = header
    
    if not conn_response is None:
        # send file
        if 'file' in conn_response and isinstance(conn_response['file'], file):
            res_file= conn_response['file'].read()
            conn_response['file'].close()
            return dict()
        # output json
        else:
            return RESPONSE.json(conn_response)
    ##TODO : Apply Large Files Method
    #Massimo: No. For large files use this instead:

    #def index():
    #
    #form=FORM((INPUT(_type='file',_name='myfile'),INPUT(_type='submit'))
    #    if form.accepts(request.vars,session):
    #
    #shutil.copyfileobj(form.myfile.file,open(os.path.join(request.folder,'static','filename.txt'),'wb'))
    #          response.flash='uploaded'
    #    return dict(form=form
    
#    return conn_response



