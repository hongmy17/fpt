/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package lab8;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class Lab8Bai2 {
    final class XPoly {
        public static final double sum(double...x) {
            double sum = 0;
            
            for (double val : x)
                sum += val;
            
            return sum;
        }
        
        public static double min(double...x) {
            double min = x[0];
            int n = x.length;
            
            for (int i = 1; i < n; i++)
                if (min < x[i])
                    min = x[i];
            
            return min;
        }
        
        public static double max(double...x) {
            double max = x[0];
            int n = x.length;
            
            for (int i = 1; i < n; i++)
                if (max < x[i])
                    max = x[i];
            
            return max;
        }
    }
    
    public static void main(String[] args) {
        
    }
}
