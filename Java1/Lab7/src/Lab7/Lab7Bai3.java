package Lab7;
import java.util.Scanner;
import Lab7.Lab7Bai2.SinhVienPoly;
/**
 *
 * @author Pham Quang Linh PC05353
 */
public class Lab7Bai3 {

    public static class SinhVienIT extends SinhVienPoly {
        public double diemJava;
        public double diemCss;
        public double diemHtml;
        
        public SinhVienIT(String ten, String nganh, double diemJava, double diemCss, double diemHtml) {
            super(ten, nganh);
            this.diemJava = diemJava;
            this.diemHtml = diemHtml;
            this.diemCss = diemCss;
        }
        
        @Override
        public double getDiem() {
            return (2 * diemJava + diemCss + diemHtml) / 4;
        }
    }
    
    public static class SinhVienBiz extends SinhVienPoly {
        public double diemMarketing;
        public double diemSales;
        
        public SinhVienBiz(String ten, String nganh, double diemMarketing, double diemSales) {
            super(ten, nganh);
            this.diemMarketing = diemMarketing;
            this.diemSales = diemSales;
        }
        
        @Override
        public double getDiem() {
            return (2 * diemMarketing + diemSales) / 3;
        }
    }
    
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        System.out.print("Moi nhap ten: ");
        String ten = sc.nextLine();
        
        System.out.print("Moi nhap nganh (IT / Marketing): ");
        String nganh = sc.nextLine();
        
        if (nganh.equalsIgnoreCase("IT")) {
            System.out.print("Nhap diem Java: ");
            double diemJava = sc.nextDouble();

            System.out.print("Nhap diem CSS: ");
            double diemCss = sc.nextDouble();

            System.out.print("Nhap diem HTML: ");
            double diemHtml = sc.nextDouble();

            SinhVienIT svIT = new SinhVienIT(ten, nganh, diemJava, diemCss, diemHtml);
            svIT.xuat();
        } else {
            System.out.print("Moi nhap diem Marketing: ");
            double diemMarketing = sc.nextDouble();
            
            System.out.print("Moi nhap diem Sales: ");
            double diemSales = sc.nextDouble();
            
            SinhVienBiz svBiz = new SinhVienBiz(ten, nganh, diemMarketing, diemSales);
            svBiz.xuat();
        }
    }
}
