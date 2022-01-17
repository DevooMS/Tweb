
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Get_Session_JavaScript_MVC.Controllers
{
    public class HomeController : Controller
    {
        // GET: Home
        public ActionResult Index()
        {
            Session["Person"] = "Mudassar";

            return View();
        }

        [HttpPost]
        public JsonResult AjaxMethod(string sessionName)
        {
            return Json(Session[sessionName]);
        }
    }
}