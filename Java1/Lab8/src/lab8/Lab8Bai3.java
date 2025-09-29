/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package lab8;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class Lab8Bai3 {
    final class XPoly {
        public static final double sum(double ...x) {
            double sum = 0;
            
            for (double val : x)
                sum += val;
            
            return sum;
        }
        
        public static double min(double ...x) {
            double min = x[0];
            int n = x.length;
            
            for (int i = 1; i < n; i++)
                if (x[i] < min)
                    min = x[i];
            
            return min;
        }
        
        public static double max(double ...x) {
            double max = x[0];
            int n = x.length;
            
            for (int i = 1; i < n; i++)
                if (x[i] > max)
                    max = x[i];
            
            return max;
        }
        
        public static String toUpperFirstChar(String s) {
            s = s.toLowerCase();
            s = s.trim();
            s = " " + s;
            int strLen = s.length();
            
            for (int i = 0; i < strLen; i++) {
                if (s.charAt(i) == ' ' && s.charAt(i + 1) != ' ') {
                    String rep = s.substring(i , i + 2);
                    s = s.replace(rep, rep.toUpperCase());
                }
            }
            
            String[] ss = s.split(" ");
            s = "";
            int ssLen = ss.length;
            
            for (int i = 0; i < ssLen; i++) {
                if (!ss[i].equals("")) {
                    s += ss[i];
                    s += " ";
                }
            }
            
            return s.trim();
        }
    }
    
    public static void main(String[] args) {
        String s = "   ngUYeN   vAn    teo   ";
        s = XPoly.toUpperFirstChar(s);
        System.out.println(s);
    }
}
