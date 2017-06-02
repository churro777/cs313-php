
public class InterfaceDemo {

   public static void main(String[] args) {

        ArrayList<Tossable> things = new ArrayList<Tossable>;
        things.add(new Rock());
        things.add(new Rock());
        things.add(new Ball());
        things.add(new Ball());
        things.add(new Ball());

        for (int i = 0; i < things.length; i++ ) {
            things[i].toss()
        }
   }
}


public Interface Tossable {
    void toss();
}

public class Rock implements Tossable {
    @Override
}
