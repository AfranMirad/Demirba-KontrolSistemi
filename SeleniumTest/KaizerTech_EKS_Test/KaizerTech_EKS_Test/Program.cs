using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Security.Cryptography.X509Certificates;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using OpenQA.Selenium;
using OpenQA.Selenium.Chrome;
using OpenQA.Selenium.Firefox;

namespace KaizerTech_EKS_Test
{
    class Program
    {
        static IWebDriver driver = new ChromeDriver();
        static string link = @"http://localhost/KaizerTech_HW/";
        static void Main(string[] args)
        {
            // 1. Use Case Giriş Yap
            girisYap("admin@kaizertech.com", "admin123");
            // 2. Use Case Urun sayfasından Urun ara
            UrunAra("Monster");
            // 3. Use Case Urun Ekle
            UrunEkle("ASUS dizÜstü bilgisayar", "2553");
            // 4. Use Case Parca Ekle
            ParcaEkle("DDR4 Kingston Ram","650");
            // 5. Use Case Bölüme Git Personel ara
            PersonelAra("Erdal");
            // 6. Use Case Çıkış Yap
            CikisYap();

        }

        private static void girisYap(string Mail, string Parola)
        {
            driver.Navigate().GoToUrl(link);
            driver.FindElement(By.XPath("/html/body/div/div/div/form/div[1]/input")).SendKeys(Mail);
            driver.FindElement(By.XPath("/html/body/div/div/div/form/div[2]/input")).SendKeys(Parola);
            driver.FindElement(By.XPath("/html/body/div/div/div/form/div[3]/button")).Click();

        }
        public static void UrunAra(string Urun)
        {
            Thread.Sleep(3000); 
            driver.FindElement(By.XPath("//*[@id='wrapper']/ul/li[2]/a/span")).Click();
            driver.FindElement(By.XPath("//*[@id='dataTable_filter']/label/input")).SendKeys(Urun);
        }

        public static void UrunEkle(string Urun, string Fiyati)
        {
            Thread.Sleep(3000);
            driver.FindElement(By.XPath("//*[@id='content-wrapper']/div[1]/div[2]/form/div/div/a[1]/button")).Click();
            Thread.Sleep(3000);
            driver.FindElement(By.XPath("//*[@id='content-wrapper']/div[1]/div[2]/form/div/div[1]/input")).SendKeys(Urun);
            driver.FindElement(By.XPath("//*[@id='content-wrapper']/div[1]/div[2]/form/div/div[2]/input")).SendKeys(Fiyati);
            driver.FindElement(By.XPath("//*[@id='content-wrapper']/div[1]/div[2]/form/div/div[3]/button")).Click();
        }
        public static void ParcaEkle(string Parca, string Fiyati)
        {
            Thread.Sleep(3000);
            driver.FindElement(By.XPath("//*[@id='wrapper']/ul/li[2]/a/span")).Click();
            Thread.Sleep(3000);
            driver.FindElement(By.XPath("//*[@id='content-wrapper']/div[1]/div[2]/form/div/div/a[3]/button")).Click();
            Thread.Sleep(3000);
            driver.FindElement(By.XPath("//*[@id='content-wrapper']/div[1]/div[2]/form/div/div[1]/input")).SendKeys(Parca);
            driver.FindElement(By.XPath("//*[@id='content-wrapper']/div[1]/div[2]/form/div/div[2]/input")).SendKeys(Fiyati);
            driver.FindElement(By.XPath("//*[@id='content-wrapper']/div[1]/div[2]/form/div/div[4]/button")).Click();
        }
        public static void PersonelAra(string personel)
        {
            Thread.Sleep(3000);
            driver.FindElement(By.XPath("//*[@id='wrapper']/ul/li[3]/a/span")).Click();
            Thread.Sleep(3000);
            driver.FindElement(By.XPath(" //*[@id='dataTable_filter']/label/input")).SendKeys(personel);
        }
        public static void CikisYap()
        {
            Thread.Sleep(3000);
            driver.FindElement(By.XPath("//*[@id='userDropdown']/i")).Click();
            Thread.Sleep(3000);
            driver.FindElement(By.XPath("//*[@id='page-top']/nav/ul/li/div/a")).Click();
            Thread.Sleep(3000);
            driver.FindElement(By.XPath("//*[@id='logoutModal']/div/div/div[3]/a")).Click();
        }   
       
    }
}
